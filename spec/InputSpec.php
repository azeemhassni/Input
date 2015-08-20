<?php namespace spec\Azi;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Azi\Input');
    }

    function it_returns_a_value_from_post_request()
    {
        $_POST[ 'name' ] = 'John Doe';
        $this->post('name')->shouldReturn('John Doe');
    }


    function it_returns_a_value_from_get_request()
    {
        $_GET[ 'name' ] = "Jann Doe";
        $this->get('name')->shouldReturn('Jann Doe');
    }


    function it_returns_a_value_from_any_request()
    {
        $_REQUEST[ 'name' ] = "Azi";
        $_REQUEST[ 'url' ]  = "http://example.com";

        $this->request('name')->shouldReturn('Azi');
        $this->request('url')->shouldReturn('http://example.com');
    }

    function it_removes_html_from_value()
    {
        $_POST[ 'subject' ] = "<p>Hello Github</p>";

        $this->post('subject')->shouldReturn('Hello Github');
    }


    function it_returns_everything()
    {
        $_REQUEST            = array();
        $_REQUEST[ "name" ]  = "John Doe";
        $_REQUEST[ "email" ] = "john@example.com";

        $this->all()->shouldReturn(array("name" => "John Doe", "email" => "john@example.com"));
    }


    function it_determines_existance_of_a_value(){
        $this->exists('website')->shouldReturn(false);
    }



}
