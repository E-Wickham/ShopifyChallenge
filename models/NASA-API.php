<?php

class PicOfDay {

    private $url = "https://api.nasa.gov/planetary/apod?api_key=HFJFzfQnZA45cINot957sMxng6WZYni2C4x0WZYI";
    #private $auth = array('Authorization: Token token=YOUR PODCAST AUTHORIZATION TOKEN'); 
    
    //Properties and Methods go here

    public function getPic() {
        $url = $this->url;

        //return $url;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);


        curl_close($curl);
        $picture = json_decode($resp);

        return $picture;

        
    }
    


}
    
