<?php

namespace Elsk\ElskModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

	public function getAll(){
		return $this->findAll();
	}

	/**
	 * Get all users matching the criteria
	 *
	 * @param $type
	 * @return array
	 */
	public function getAllByUserType($type){
		return $this->findBy(['type' => $type]);
	}

} 