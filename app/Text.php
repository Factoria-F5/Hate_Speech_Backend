<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    private  $url = "https://commentanalyzer.googleapis.com/v1alpha1/comments:analyze?key=AIzaSyAks8WXGgBb7YQvlDwzZz3DKDPrjDFcFlE";

    public function checkSeverity($text= "")
    {

/*
        $opts = [
            'http' => [
                'method' => 'POST',
                'header' => ['Content-Length: 0','Content-Type:application/json','User-Agent: PHP'],
                'content' => ["comment"=>["text"=> "what kind of idiot name is foo?"]],
       "languages"=> ["en"],
       "requestedAttributes"=> ["TOXICITY"=>[]]]
        ];



        $context = stream_context_create($opts);
        $response = file_get_contents($this->url, false, $context);
        $decodedResponse = json_decode( $response );
        $this->repositories = collect($decodedResponse);
        return $this->repositories;
*/

        $ch = curl_init();



        $postdata = http_build_query(
            array(
                'comment' => ["text"=> "what kind of idiot name is foo?"],
                'languages' => ["en"],
                'requestedAttributes'=> ["TOXICITY"=>[]]
            )
        );


        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/json',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        $result = file_get_contents($this->url, false, $context);

        return $result;


    }

}
