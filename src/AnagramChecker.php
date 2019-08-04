<?php
/**
 * This file is part of the Jubstuff.AnagramChecker
 *
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace Jubstuff\AnagramChecker;

class AnagramChecker
{
    public function isAnagram(string $word1, string $word2): bool
    {
        if (strlen($word1) !== strlen($word2)) {
            return false;
        }

        $char_w1 = $this->sortWordChars($word1);
        $char_w2 = $this->sortWordChars($word2);

        if ($char_w1 !== $char_w2) {
            return false;
        }

        return true;
    }

    private function sortWordChars(string $word): array
    {
        $chars = str_split($word);
        sort($chars);

        return $chars;
    }
}
