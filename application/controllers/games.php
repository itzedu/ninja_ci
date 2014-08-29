<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games extends CI_Controller {

    public function index()
    {   
      $this->setGame();
      $this->load->view('index',$this->session->all_userdata());
    }

    public function setGame()
    {
      $score = $this->session->userdata('score');
      $activities = $this->session->userdata('activities');
      if (!$score)
      {
        $this->session->set_userdata('score', 0);
      }
      if (!$activities)
      {
        $this->session->set_userdata('activities', array());
      }
    }

    public function update()
    {
      $clicked = $this->input->post();

      if (!empty($clicked['farm']))
      {
        $gold = rand(10,20);
      }
      elseif (!empty($clicked['cave']))
      {
        $gold = rand(5,10);
      }
      elseif (!empty($clicked['house']))
      {
        $gold = rand(2,5);
      }
      elseif (!empty($clicked['casino']))
      {
        $chance = rand(1,10);
        if ($chance < 8)
        {
          $gold = rand(-50,0);
        }
        else
        {
          $gold = rand(0,50);
        }
      }
      $score = $this->session->userdata('score');
      $this->session->set_userdata('score', $score + $gold);
      
      $array = $this->session->userdata('activities');
      if ($gold < 0)
      {
        foreach ($clicked as $key=>$value)
        {
          array_push($array, "You entered a " . $key  . " and lost " . $gold . " golds... Ouch" . " " . date("M, d, Y, H:i:s"));
        }
      }
      else
      {
        foreach ($clicked as $key=>$value)
        {
          array_push($array, "You earned " . $gold  . " from " . $key . " " . date("M, d, y, H:i:s"));
        }
      }

      if ($this->session->userdata('score') < 0)
      {
        array_push($array, "You are out of gold. Please restart the game");
      }

      $this->session->set_userdata('activities', $array);
      

      redirect('/games/index');
    }

    public function destroy()
    {
      $this->session->sess_destroy();
      redirect('/games/index');
    }


}
