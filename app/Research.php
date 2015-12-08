<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //

	public function author() {
	   return $this->hasMany('\p4\Author');

	}

	public static function researchToEdit ()  {

		$user = \Auth::user();
			dump($user);
		$author = \p4\Author::where('email', '=', $user->email)->get()->toArray();
		dump($author);
		$research_id = $author['0']['research_id'];
		echo 'research_id is: ' . $research_id;
		$research_dump = \p4\Research::with('author')->where('id', '=', $research_id)->get()->toArray();

		$research = [];
		$research['id'] = $research_dump['0']['id'];
		$research['type'] = $research_dump['0']['type'];
		$research['title'] = $research_dump['0']['title'];
		$research['background'] = $research_dump['0']['background'];
		$research['design'] = $research_dump['0']['design'];
		$research['findings'] = $research_dump['0']['findings'];
		$research['discussion'] = $research_dump['0']['discussion'];
		$research['impact'] = $research_dump['0']['impact'];
		$research['abstract'] = $research_dump['0']['abstract'];

		$research['p_first_name'] = $research_dump['0']['author']['0']['first_name'];
		$research['p_last_name'] = $research_dump['0']['author']['0']['last_name'];
		$research['p_organization'] = $research_dump['0']['author']['0']['organization'];
		$research['p_email'] = $research_dump['0']['author']['0']['email'];

		$research['1_first_name'] = $research_dump['0']['author']['1']['first_name'];
		$research['1_last_name'] = $research_dump['0']['author']['1']['last_name'];
		$research['1_organization'] = $research_dump['0']['author']['1']['organization'];
		$research['1_email'] = $research_dump['0']['author']['1']['email'];
		$research['1_type'] = $research_dump['0']['author']['1']['type'];

		return $research;

	}
}
