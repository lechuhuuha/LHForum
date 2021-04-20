<?php

namespace Lchh;

class HtmlCut
{

    // If the $test have < then is in open state
    protected $is_open   = false;
    // If the $test have open state then is had grab
    protected  $grab_open = false;
    // If the $text have / then is in close state
    protected $is_close  = false;
    // If the $text have " then is in double quoute state
    protected $in_double_quotes = false;
    // If the $text have ' then is in double quoute state
    protected $in_single_quotes = false;
    // The tag name that will get inject into $tags array
    public function textLimit($text, $max_length)
    {
        $i = 0;
        $stripped = 0;
        $tags   = array();
        $result = "";
        $tag = "";

        $stripped_text = strip_tags($text);
        while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length) {
            $symbol = $text[$i];
            $result .= $symbol;
            switch ($symbol) {
                case '<':
                    $this->is_open = true;
                    $this->grab_open = true;
                    break;
                case '"':
                    if ($this->in_double_quotes)
                        $this->in_double_quotes = false;
                    else
                        $this->in_double_quotes = true;
                    break;
                case "'":
                    if ($this->in_single_quotes)
                        $this->in_single_quotes = false;
                    else
                        $this->in_single_quotes = true;
                    break;
                case '/':
                    if ($this->is_open && !$this->in_double_quotes && !$this->in_single_quotes) {
                        $this->is_close = true;
                        $this->is_open = false;
                        $this->grab_open = false;
                    }
                    break;
                case ' ':
                    if ($this->is_open)
                        $this->grab_open = false;
                    else
                        $stripped++;
                    break;
                case '>':
                    if ($this->is_open) {
                        $this->is_open = false;
                        $this->grab_open = false;
                        array_push($tags, $tag);
                        $tag = "";
                    } elseif ($this->is_close) {
                        $this->is_close = false;
                        array_pop($tags);
                        $tag = "";
                    }
                    break;
                default:
                    if ($this->grab_open || $this->is_close) {
                        $tag .= $symbol;
                    }
                    if (!$this->is_open && !$this->is_close)
                        $stripped++;
                    break;
            }
            $i++;
        }
        while ($tags) {
            $result .= "<" . array_pop($tags) . ">";
        }
        return $result;
    }
}
