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

	public function getCreateResearch() {
		//need to add send all users here and redirect to research.add if they do not have an entry
		//If there is an entry, pass queried data to view research.show
		$user = \Auth::user();
		if(is_null($user))
			redirect ('/login');
		else
			{
				$author = \p4\Author::where('email', '=', $user->email)->get();
				dump($author);


				if (sizeof($author)==0)
						{
							\Session::flash('flash_message', 'No submission entry associated with your email address found. You will be redirected to create a new submission.');
								return view('research.add');
						}
				else
					{
							$research = \p4\Research::with('author')->find($author['0']['research_id']);
							if (is_null($research))
									{
										\Session::flash('flash_message', 'No submission entry associated with your email address was found. You will be redirected to create a new submission.');
										return view('research.add');
									}
					 }
			 }

	  session(['research' => $research]);
	  return redirect('/research/show')->with('research', $research);
}


	public function postCreateResearch(Request $request) {

		$this->validate(
		   $request,
		   [
					'title' => 'required|min:10',
					'background' => 'required|min:40',
					'design' => 'required|min:40',
					'discussion'  => 'required|min:40',
					'findings'  => 'required|min:40',
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
		$research->findings = $request->findings;
		$research->design = $request->design;
		$research->discussion = $request->discussion;
		$research->impact = $request->impact;
		$research->abstract = $request->abstract;

		$research->save();

		$research_id = $research->id;
		session(['research_id' => $research_id]);
			return redirect('/authors/add');
	}

	public function getCreateAuthors() {
				return view('authors.add');
	}

	public function postCreateAuthors(Request $request) {

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
		{
		$author = new \p4\Author();
		if($i == '1')
			{
	    $author->first_name = $request->first1;
			$author->last_name = $request->last1;
			$author->organization = $request->organization1;
			$author->email = $request->email1;
		 	$author->research_id = $request->research_id;
			$author->type = "P";
			}
		else
			{
			 $author->first_name = $request->first2;
	 		 $author->last_name = $request->last2;
	 		 $author->organization = $request->organization2;
	 		 $author->email = $request->email2;
	 		 $author->research_id = $request->research_id;
	 		 $author->type = "S";
			}
			 $author->save();
		}

	\Session::flash('flash_message', 'Primary and secondary authors added.');

	$research = \p4\Research::with('author')->find($author->research_id);
  session(['research' => $research]);

  return redirect('/research/show');
}

public function getShowResearch() {

	$research = session('research');
  return view('/research/show')->with('research', $research);
}

public function postShowResearch() {

	$research = session('research');
  return redirect('/research/edit')->with('research', $research);
}


public function getEditResearch() {

			$research = session('research');

			$user = \Auth::user();
			$author = \p4\Author::where('email', '=', $user->email)->get();

			if (is_null('author'))
					{
						\Session::flash('flash_message', 'ID for Research Not Found');
						return redirect('research/add');
					}
			else
						{
							$authors = \p4\Author::where('research_id', '=', $author['0']['research_id'])->get();
							$researches = \p4\Research::where('id', '=', $author['0']['research_id'])->get();
							session(['researches' => $researches, 'authors' => $authors]);
							if (is_null($researches))
									{
										\Session::flash('flash_message', 'ID for Research Not Found');
										return redirect ('research/add');
									}
					   }

			return view('/research/edit')->with(['researches' => $researches, 'authors' => $authors]);
}


	public function postEditResearch(Request $request) {

		$research = session('research');

		if(is_null($request)) {
		\Session::flash('flash_message', 'Research Entry Not Found');
		return redirect('research.add');
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
			$research = \p4\Research::find($request->research_id);
			$research->type = $request->paper_poster;
			$research->title = $request->title;
			$research->background = $request->background;
			$research->design = $request->design;
			$research->discussion = $request->discussion;
			$research->impact = $request->impact;
			$research->abstract = $request->abstract;
			$research->save();

			for($i= '1'; $i <6; $i++)
				{
					$id = 'id' . $i;
					if (!is_null($request->$id))
						{
						$author = \p4\Author::find($request->$id);

						$first = 'first' . $i;
						$author->first_name = $request->$first;

						$last = 'last' . $i;
		  			$author->last_name = $request->$last;

						$organization = 'organization' . $i;
						$author->organization = $request->$organization;

						$email = 'email' . $i;
						$author->email = $request->$email;

					  $author->save();
				 		}
				}
				$research = \p4\Research::with('author')->find($request->research_id);
				session(['research' => $research]);
			  return redirect('/research/show');
	}


	public function getConfirmDelete() {

		$user = \Auth::user();
		$author = \p4\Author::where('email', '=', $user->email)->get();

		if (is_null('author'))
				{
					\Session::flash('flash_message', 'ID for Research Not Found');
					return redirect('research.add');
				}
		else
					{
						$research = \p4\Research::with('author')->find($author['0']['research_id']);
						session(['research' => $research]);
						if (is_null($research))
								{
									\Session::flash('flash_message', 'ID for Research Not Found');
									redirect ('research.add');
								}
					 }

		return view('/research/delete')->with(['research' => $research]);
}


	public function postDoDelete() {

				$research = session('research');

				#remove authors first
				$submission = \p4\Research::find($research->id);
				$authors = \p4\Author::where('research_id', '=', $research->id);


	//					if(is_null($submission)) {
	//						\Session::flash('flash_message', 'Research submission was not found');
	//						return redirect('research/add');
	//					}

//				$authors = \p4\Author::find($research->research_id);
//				if(is_null($authors)) {
//					\Session::flash('flash_message', 'Authors for research submission were not found.');
//					return redirect('research/edit');
//				}

				$authors->delete();
				$submission->delete();

		return view('/research/add');
	}


}
