<?php

class WordnetApi {


    private $word;

    /**
     *
     * @param String $word
     * @example echo WordnetApi::_new("happy")->getRandomSynonym();
     */
    function __construct($word="") {
        $this->word = $word;
    }

    /**
     * alias of constructor so that you can create and use this class in single line
     * @param type $word
     * @return \WordnetApi
     */
    static function _new($word = ""){
        return new WordnetApi($word);
    }

    /**
     * Returns set of all synonyms
     * @return Array
     */
    public function getSynonyms(){
        $page = file_get_contents("http://wordnetweb.princeton.edu/perl/webwn?s=" . $this->word);
        preg_match_all("/\;s=([a-z]+)/", $page, $matches);
        if(isset($matches[1])){
            return array_unique($matches[1]);
        }
        return array($this->word);
    }

    /**
     * Returns a random synonym
     * @return String
     */
    public function getRandomSynonym(){
        $synonyms = $this->getSynonyms();
        return $synonyms[array_rand($synonyms)];
    }

}


function synonym_queries($search_query_words) {

    $stop_words = "a,about,above,after,again,against,all,am,an,and,any,are,aren't,as,at,be,because,been,
                  before,being,below,between,both,but,by,can't,cannot,could,couldn't,did,didn't,do,does,
                  doesn't,doing,don't,down,during,each,few,for,from,further,had,hadn't,has,hasn't,have,
                  haven't,having,he,he'd,he'll,he's,her,here,here's,hers,herself,him,himself,his,how,
                  how's,i,i'd,i'll,i'm,i've,if,in,into,is,isn't,it,it's,its,itself,let's,me,more,most,
                  mustn't,my,myself,no,nor,not,of,off,on,once,only,or,other,ought,our,ours,	ourselves,
                  out,over,own,same,shan't,she,she'd,she'll,she's,should,shouldn't,so,some,such,than,
                  that,that's,the,their,theirs,them,themselves,then,there,there's,these,they,they'd,
                  they'll,they're,they've,this,those,through,to,too,under,until,up,very,was,wasn't,
                  we,we'd,we'll,we're,we've,were,weren't,what,what's,when,when's,where,where's,which,
                  while,who,who's,whom,why,why's,with,won't,would,wouldn't,you,you'd,you'll,you're,
                  you've,your,yours,yourself,yourselves";
    $stop_words_array = explode(",", $stop_words);

    $query_words = array();
    $queries = array () ;

	foreach (explode(" ", $search_query_words) as $single_word) {
		if (!in_array($single_word, $stop_words_array)) {
			$query_words[] = strtolower($single_word);
		}
	}

	$q = implode(" ", $query_words);
	foreach ($query_words as $key => $word) {

// Get synonyms
		$synonyms = WordnetApi::_new($word) -> getSynonyms();

		foreach ($synonyms as $synonym) {
			if (true == word_exists($synonym)) {

				$nq = str_replace($word, $synonym, $q);
				if (!in_array($nq, $queries)) {
					$queries[] = $nq;
				}
			} // end if(word_exists($synonym))
		} // end foreach ($synonyms as $synonym){
	}// end foreach ($query_words as $key=>$word)

	return $queries;

}// end function synonym_queries

function word_exists($word) {

//    $mysqli = connect();
//	$results = $mysqli ->query('SELECT word FROM words WHERE word="' . $word . '"');
//	$table  = mysqli_fetch_array($results,MYSQL_ASSOC);

//	if (count($table) < 1) {
//		return false;
//	} else {
		return true;
//	}
}


?>
