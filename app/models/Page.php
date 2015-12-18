<?php

class Page extends Eloquent {

	public static function getAllPages() {
		$get_pages = DB::table('pages')->orderBy('title', 'asc')->paginate(10);
		
		return $get_pages;		
		
	}
	
	public static function getPage($id) {
		$get_page = DB::table('pages')->where('id','=',$id)->orderBy('title','asc')->get();
		
		return $get_page;		
		
	}	
	
	public static function getPageBySlug($slug) {
		$get_page = DB::table('pages')->where('slug','=',$slug)->get();
		
		return $get_page;			
	}
	
	public static function UpdatePage($id,$data) {
		
		$content = Purifier::clean($data['content']);
		$description = Purifier::clean($data['content'], 'noHtml');
		
		$update_content = DB::table('pages')	
			            ->where('id', $id)
            ->update(array('title' => $data['title'], 'slug' => $data['slug'], 'content' => $content, 'description' => $description));
            
        return $update_content;		
	}		
	
	public static function deletePage($id) {
		$delete_content = DB::table('pages')->where('id', '=', $id)->delete();
		
		return $delete_content;
	}

}