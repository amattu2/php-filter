<?php
/*
 * Produced: Thu Mar 09 2023
 * Author: Alec M.
 * GitHub: https://amattu.com/links/github
 * Copyright: (C) 2023 Alec M.
 * License: License GNU Affero General Public License v3.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace amattu2;

class Filter
{
  /**
   * Remove HTML Tags, Non-Printable Characters, Slashes from a string
   *
   * @param string $input
   * @return string filtered
   * @throws \TypeError
   **/
  public static function input(string $input): string
  {
    // Variables
    $input = strip_tags($input);
    $input = preg_replace('/[^\00-\255]+/u', '', $input);
    $input = stripslashes($input);

    // Return
    return $input;
  }

  /**
   * Remove Non-numeric characters from a string
   *
   * @param mixed $input
   * @return int|double|float|null filtered
   **/
  public static function nonNumeric($input)
  {
    // Variables
    $type = gettype($input);

    // Checks
    if ($type === "string") {
      return preg_replace('/[^0-9]/', '', $input);
    } else if ($type === "integer") {
      return $input;
    } else if ($type === "double") {
      return $input;
    } else if ($type === "float") {
      return $input;
    } else {
      return 0;
    }
  }

  /**
   * Remove Non-Alpha characters (a-zA-Z) from a string
   *
   * @param string $input
   * @return string filtered
   **/
  public static function nonAlpha($input): string
  {
    // Variables
    $type = gettype($input);

    // Checks
    if ($type === "string") {
      return preg_replace('/\PL/u', '', $input);
    } else {
      return "";
    }
  }

  /**
   * Remove Non-Alphanumeric characters (a-zA-Z0-9) from a string
   *
   * @param string $input
   * @return string filtered
   **/
  public static function nonAlphaNumeric($input): string
  {
    // Variables
    $type = gettype($input);

    // Checks
    if ($type === "string") {
      return preg_replace("/(\W)+/", '', $input);
    } else if ($type === "integer") {
      return strval($input);
    } else if ($type === "double") {
      return strval($input);
    } else if ($type === "float") {
      return strval($input);
    } else {
      return "";
    }
  }

  /**
   * Replace string whitespace characters with dashes
   *
   * @param string $input
   * @return string replaced
   * @throws \TypeError
   **/
  public static function fileName(string $input): string
  {
    return preg_replace("/[\s_]/", "-", trim($input));
  }

  /**
   * Remove invalid characters from string|int and format phone number
   *
   * @param string|int $input
   * @return string filtered
   **/
  public static function number($input): string
  {
    // Variables
    $type = gettype($input);

    // Checks
    if ($type === "string") {
      $input = preg_replace("/[^\d]/", "", $input);
    } else if ($type === "integer") {
      $input = strval($input);
    } else {
      return "";
    }

    // Return
    return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $input);
  }

  /**
   * Remove two or more spaces from a string
   *
   * @param string $input
   * @return string replaced
   * @throws \TypeError
   * @author Alec M. <https://amattu.com>
   */
  public static function spaces(string $input): string
  {
    return preg_replace('/  +/', ' ', $input);
  }
}
