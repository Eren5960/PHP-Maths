<?php
/*
*  _____               _               ___   ___  __
* /__   \___  _ __ ___| |__   /\/\    / __\ / _ \/__\
*   / /\/ _ \| '__/ __| '_ \ /    \  / /   / /_)/_\
*  / / | (_) | | | (__| | | / /\/\ \/ /___/ ___//__
*  \/   \___/|_|  \___|_| |_\/    \/\____/\/   \__/
*
* (C) Copyright 2019 TorchMCPE (http://torchmcpe.fun/) and others.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*
* Contributors:
* - Eren Ahmet Akyol
*/

/**   EXAMPLE
$start = microtime(true);
$calcute = new Calcute(5, 2);
$answer = $calcute->combination(7, 2);
echo "Answer found \"" . $answer . "\" in " . (microtime(true) - $start) . "ms";
*/
final class Calcute{
	/** @var int */
	private $second;
	/** @var int */
	private $first;

	public function __construct(int $first, int $second){
		$this->first = $first;
		$this->second = $second;
	}

	public static function factorial(int $number): float{
		if($number <= 1) return 1;
		$end = 1;
		foreach(range(2, $number) as $i){
			$end *= $i;
		}
		return $end;
	}

	public function permutation(): float{
		if(($return = self::validate()) !== 0) return $return;
		$end = 1;
		foreach(range($this->first, ($this->first - $this->second)+1) as $i){
			$end *= $i;
		}
		return $end;
	}

	public function combination() : float{
		if(($return = self::validate()) !== 0) return $return;
		return self::factorial($this->first) / (self::factorial($this->second) * self::factorial($this->first - $this->second));
	}

	public function validate(): int{
		if($this->first <= 1) return 1;
		if($this->second == 0) return 1;
		if($this->second > $this->first) throw new \InvalidArgumentException();
		return 0;
	}
}
