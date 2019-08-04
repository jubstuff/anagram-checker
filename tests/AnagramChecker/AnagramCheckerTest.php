<?php
/**
 * This file is part of the Jubstuff.AnagramChecker
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Jubstuff\Test\AnagramChecker;

use Jubstuff\AnagramChecker\AnagramChecker;
use PHPUnit\Framework\TestCase;

class AnagramCheckerTest extends TestCase
{
    /**
     * @var AnagramChecker
     */
    protected $ac;

    protected function setUp()
    {
        $this->ac = new AnagramChecker;
    }

    public function testIsInstanceOfAnagramChecker()
    {
        $actual = $this->ac;
        $this->assertInstanceOf(AnagramChecker::class, $actual);
    }

    public function testSameWordIsAnagram()
    {
        $this->assertTrue($this->ac->isAnagram('roma', 'roma'));
    }

    public function testDifferentLengthWordsAreNotAnagrams()
    {
        $this->assertFalse($this->ac->isAnagram('roma', 'amore'));
    }

    public function testCanSpotRealAnagrams()
    {
        $this->assertTrue($this->ac->isAnagram('roma', 'amor'));
        $this->assertTrue($this->ac->isAnagram('roma', 'mora'));
        $this->assertTrue($this->ac->isAnagram('roma', 'orma'));
    }

    public function testTwoWordWithSameLengthAreNotAnagrams()
    {
        $this->assertFalse($this->ac->isAnagram('roma', 'amoo'));
    }

    public function testCheckIsCaseInsensitive()
    {
        $this->assertTrue($this->ac->isAnagram('Roma', 'AMOR'));
    }
}
