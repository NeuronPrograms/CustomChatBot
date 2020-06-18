<?php

class ChatLine {

    private $answers; // collection of strings (answers for this collection of questions
    private $question_groups; // collection of question , each one presented as array of keywords

    public function __construct($ans, $que) {
        $this->answers = $ans;
        $this->question_groups = $que;
    }

    public function get_random_answer() { // pick a random answer
        return $this->answers[array_rand($this->answers)];
    }

    public function check_question($sentence) { // check if the passed question matches any of the stored questions of this Line
        $words = explode(" ", $sentence);
        $matches = 0; //number of groups matched
        foreach ($this->question_groups as $c) {
            $in_collection = true;
            foreach ($c as $single) {
                $word_found = false;
                foreach ($words as $w) {
                    $word_found|= (trim(strtolower($w)) == trim(strtolower($single)));
                }
                $in_collection &= $word_found;
            }
            if ($in_collection)
                $matches++;
        }
        return $matches > 0;
    }

}
