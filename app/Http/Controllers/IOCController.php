<?php

namespace p4\Http\Controllers;

use p4\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IOCController extends Controller {

	public function _construct() {
	   # Put anything here that should happen before any of the other actions
	}

	/**
	* Responds to request to show randomly generated data
	*/

	public function getEligibility() {
		return view('eligibility');
	}

	public function getPoster() {
		return view('poster');
	}

	public function getPaper() {
		return view('paper');
	}

	public function getGuidelines() {
		return view('guidelines');
	}

	public function getCreateAuthors() {
			return view('authors.add');
  }

	public function postCreateAuthors(Request $request) {

		echo 'In postCreateAuthors function to validate';

		$this->validate(
		   $request,
		   [
	 			 	'first1' => 'required|min:2',
					'last1' => 'required|min:3',
					'organization1' => 'required|min:5',
					'email1'  => 'required|email',
		   ]
		);

		for($i=1; $i<3; $i++)
		if($i == '1')
			{
			$author = new \p4\Author();
	    $author->first_name = $request->first1;
			$author->last_name = $request->last1;
			$author->organization = $request->organization1;
			$author->email = $request->email1;
		 	$author->research_id = $request->research_id;
			$author->type = "P";
			$author->save();
			}
		else
			{
			 $author = new \p4\Author();
			 $author->first_name = $request->first2;
	 		 $author->last_name = $request->last2;
	 		 $author->organization = $request->organization2;
	 		 $author->email = $request->email2;
	 		 $author->research_id = $request->research_id;
	 		 $author->type = "S";
	 		 $author->save();
			}

//	\Session::flash('flash_message', 'Primary and secondary authors added.');
	session(['research_id' => $request->research_id]);
	return redirect('/');
}


	public function getEditAuthors( $id = null ) {
		$author = \p4\Author::find($id);

			if(is_null($author)) {
			\Session::flash('flash_message', 'ID for Authors Not Found');
			return redirect('authors');
			}
			session(['research_id' => $research_id]);
			return view(authors.edit)->with('authors', $author);
	}


	public function postEditAuthors(Request $request) {
		$author = \p4\Author::find($id);

		if(is_null($author)) {
		\Session::flash('flash_message', 'ID for Authors Not Found');
		return redirect('authors');
		}
		echo 'In postCreateAuthors function to validate';

		$this->validate(
			 $request,
			 [
					'first1' => 'required|min:2',
					'last1' => 'required|min:3',
					'organization1' => 'required|min:5',
					'email1'  => 'required|email',
			 ]
		);

		for($i=1; $i<3; $i++)
		if($i == '1')
			{
			$author = new \p4\Author();
			$author->first_name = $request->first1;
			$author->last_name = $request->last1;
			$author->organization = $request->organization1;
			$author->email = $request->email1;
			$author->research_id = $request->research_id;
			$author->type = "P";
			$author->save();
			}
		else
			{
			 $author = new \p4\Author();
			 $author->first_name = $request->first2;
			 $author->last_name = $request->last2;
			 $author->organization = $request->organization2;
			 $author->email = $request->email2;
			 $author->research_id = $request->research_id;
			 $author->type = "S";
			 $author->save();
			}

//	\Session::flash('flash_message', 'Primary and secondary authors added.');
	session(['research_id' => $request->research_id]);
		return redirect('/');
//		return view(authors.edit)->with('authors', $author);
	}


	public function getCreateResearch() {
		return view('research.add');
	}

	public function postCreateResearch(Request $request) {

		$this->validate(
		   $request,
		   [
					'title' => 'required|min:10',
					'background' => 'required|min:40',
					'design' => 'required|min:40',
					'discussion'  => 'required|min:40',
					'impact'  => 'required|min:40',
					'abstract'  => 'required|min:40'
		   ]
		);
		$user = \Auth::user();
	//Code to enter research paper or poster into database table
		$research = new \p4\Research();
		$research->type = $request->paper_poster;
		$research->title = $request->title;
		$research->background = $request->background;
		$research->design = $request->design;
		$research->discussion = $request->discussion;
		$research->impact = $request->impact;
		$research->abstract = $request->abstract;
		$research->user_id = $user->id;

		$research->save();

		$research_id = $research->id;
		session(['research_id' => $research_id]);
			return redirect('/authors/add');
	}

	public function getEditResearch( $id = null ) {
		$author = \p4\Author::find($id);

		if(is_null($author)) {
		\Session::flash('flash_message', 'ID for Authors Not Found');
		return redirect('authors');
		}
			session(['research_id' => $research_id]);
		return view(authors.edit)->with('authors', $author);
	}


	public function postEditResearch(Request $request) {
		$author = \p4\Author::find($id);

		if(is_null($author)) {
		\Session::flash('flash_message', 'ID for Authors Not Found');
		return redirect('authors');
		}
		$this->validate(
			 $request,
			 [
					'title' => 'required|min:10',
					'background' => 'required|min:40',
					'design' => 'required|min:40',
					'discussion'  => 'required|min:40',
					'impact'  => 'required|min:40',
					'abstract'  => 'required|min:40'
			 ]
		);

			//Code to enter edited research paper or poster data into database table
			$research = new \p4\Research();
			$research->type = $request->paper_poster;
			$research->title = $request->title;
			$research->background = $request->background;
			$research->design = $request->design;
			$research->discussion = $request->discussion;
			$research->impact = $request->impact;
			$research->abstract = $request->abstract;

			$research->save();

			$research_id = $research->id;
			session(['research_id' => $research_id]);

		return view(authors.edit)->with('authors', $author);
	}

}
