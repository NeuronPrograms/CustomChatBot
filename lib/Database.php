<?php

class Database {

    private $questions = [];

    
    
    
    private function init(){
      $this->questions[] = new ChatLine(["Hello.", "Hey."], [["hi"], ["hello"]]);
        $this->questions[] = new ChatLine(["I am Chatbot , how can i help you"
            , "My name is Chatbot.", "I'm Chatbot"
            , "I am Neuron's chatbot"], [["who", "are", "you"],
            ["who", "r", "u"], ["your", "name"], ["ur", "name"]]);

        $this->questions[] = new ChatLine(["I'm fine ,thanks."
            , "All is good.", "I'm ok."
            , "I am Neuron's chatbot"], [["how", "are", "you"],
            ["whats", "up"]]);


        $this->questions[] = new ChatLine(["I'm listening to you.",
            "I'm ready to help you."], [["what", "are", "you", "doin"],
            ["what", "are", "you", "doing"]]);   
    }


    
    public function __construct() {
        $this->init();
    }

    public function answer($question) { // recieve question and find  an answer
        foreach ($this->questions as $q) { // loop  over all questions
            if ($q->check_question($question)) { //once a match found 
                return $q->get_random_answer(); // get one of the programmed answers
            }
        }
        
        
        
        
        $random_temp = ["Sorry i didn't understand." ,"?" ,"Sorry ,I don't have an answer for that."
             ,"I don't know how to answer this."];
        
        
        return 
        $random_temp[array_rand($random_temp)];
       
    }

}
