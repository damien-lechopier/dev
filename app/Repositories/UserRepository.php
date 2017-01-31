<?php 

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository {

	/**
	 * User model
	 *
	 * @return string
	 */
	function model()
	{
		return "App\\Models\\User";
	}
}