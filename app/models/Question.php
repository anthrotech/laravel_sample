<?php

class Question extends Eloquent {


	public function posts()
	{
		return $this->hasMany('Post');
	}



	public static function getCurrentQuestion()
	{
		$question = self::whereNested(function($query) {

			$now = CDateTime::now();
			$query->where('start_at', '<', $now);
			$query->where('end_at', '>=', $now);

		})
		->first(['id', 'question', 'slug', 'left_option', 'right_option', 'start_at', 'end_at']);

		return $question;
	}



	public static function getTotalPointsPct($question)
	{
		if (!empty($question)) {
		$posts = $question->posts()->get(['selected_option', 'points'])->groupBy('selected_option');
		$points = [$question->left_option => 0, $question->right_option => 0];

		if($posts->isEmpty())
			return $points;

		if(array_key_exists($question->left_option, $posts->toArray())) {
			foreach($posts[$question->left_option] as $post)
				$points[$question->left_option] += $post->points;
		}

		if(array_key_exists($question->right_option, $posts->toArray())) {
			foreach($posts[$question->right_option] as $post)
				$points[$question->right_option] += $post->points;
		}

		$total_points = $points[$question->left_option] + $points[$question->right_option];
		$total_points = ($total_points != 0) ? $total_points : 1;

		$points_pct = [
			$question->left_option => round(($points[$question->left_option] / $total_points) * 100),
			$question->right_option => round(($points[$question->right_option] / $total_points) * 100)
		];
		}
		else {
			$points_pct = '0';
		}

		return $points_pct;
	}



	public static function getRemainingTime($question)
	{
		if (!empty($question)) {
		$end_at = CDateTime::createFromTimeStamp(strtotime($question->end_at));
		$now = CDateTime::now();

		$diff_in_seconds = $now->diffInSeconds($end_at, true);

		$hrs = sprintf("%02s", floor($diff_in_seconds / 3600));
		$min = sprintf("%02s", floor(($diff_in_seconds / 60) % 60));
		$sec = sprintf("%02s", $diff_in_seconds % 60);
		
		$due_date = $end_at->formatLocalized('%d %B - %A');
		$due_date_day = $end_at->formatLocalized('%d') + 1;
		$due_date_short_month = $end_at->formatLocalized('%b');
		$due_date_long_month = $end_at->formatLocalized('%B');
		$due_date_year = $end_at->formatLocalized('%Y');		

		$remaining_time = [
			'hrs' => $hrs,
			'min' => $min,
			'sec' => $sec,
		    'due_date' => $due_date,
			'due_date_day' => $due_date_day,
			'due_date_short_month' => $due_date_short_month,
			'due_date_long_month' => $due_date_long_month,
			'due_date_year' => $due_date_year
		];
		}
		else {
			$remaining_time = '';
		}

		return $remaining_time;
	}

	
	public static function getQuestionId($question = NULL)
	{
		if ($question) {
			$question_id = DB::table('questions')
						   ->select('questions.id')
						   ->where('is_active','=','1')
						   ->orderBy('start_at', 'desc')->get();
		}
		else {
			$question_id = DB::table('questions')
						   ->select('questions.id')
						   ->where('is_active','=','1')
						   ->where('question','=',$question->question)
						   ->orderBy('start_at', 'desc')->get();			
		}
		return $question_id;
	}
	
	public static function getAllQuestions() 
	{
		$get_questions = DB::table('questions')->orderBy('start_at', 'desc')->paginate(10);
		
		return $get_questions;		
		
	}
	
	
	public static function manageQuestionStatus($id,$status) {
		$update_question = DB::table('questions')	
			            ->where('id', $id)
            ->update(array('is_active' => $status));
            
        return $update_question;
	}	
	
	public static function UpdateQuestion($id,$data) {
		$start_at = $data['start_at'].' 23:00:00';
		$end_at   = $data['end_at'].' 23:59:59';
		
		$update_question = DB::table('questions')	
			            ->where('id', $id)
            			->update(array('question' => $data['question'], 'slug' => $data['slug'], 'left_option' => $data['left_option'], 'right_option' => $data['right_option'], 'start_at' => $start_at, 'end_at' => $end_at));
            
        return $update_question;		
	}	
	
	public static function CreateQuestion($data) {
		$start_at = $data['start_at'].' 00:00:00';
		$end_at   = $data['end_at'].' 23:59:59';
		
		$id = DB::table('questions')->insertGetId(
    			array('question' => $data['question'], 'slug' => $data['slug'], 'left_option' => $data['left_option'], 'right_option' => $data['right_option'], 'start_at' => $start_at, 'end_at' => $end_at)
		);		
		
        return $id;		
	}		
	
	public static function getQuestion($id) {
		$question = DB::table('questions')
					->where('id','=',$id)->get();
		
		return $question;		
	}
	

}
