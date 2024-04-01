<?php
/**
 *417 add  主要是实现ajax分页
 **/
class MY_Pagination extends CI_Pagination{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Generate the pagination links
     *
     * @access	public
     * @return	string
     */
    function create_ajax_links()
    {

        if ($this->total_rows == 0 OR $this->per_page == 0)
        {
            return '';
        }

        $num_pages = (int) ceil($this->total_rows / $this->per_page);

        if ($num_pages === 1)
        {
            return '';
        }

        $this->num_links = (int) $this->num_links;

        if ($this->num_links < 0)
        {
            show_error('Your number of links must be a non-negative number.');
        }

        if ($this->reuse_query_string === TRUE)
        {
            $get = $this->CI->input->get();

            // Unset the controll, method, old-school routing options
            unset($get['c'], $get['m'], $get[$this->query_string_segment]);
        }
        else
        {
            $get = array();
        }

        $base_url = trim($this->base_url);
        $first_url = $this->first_url;

        $query_string = '';
        $query_string_sep = (strpos($base_url, '?') === FALSE) ? '?' : '&amp;';

        if ($this->page_query_string === TRUE)
        {
            // If a custom first_url hasn't been specified, we'll create one from
            // the base_url, but without the page item.
            if ($first_url === '')
            {
                $first_url = $base_url;

                // If we saved any GET items earlier, make sure they're appended.
                if ( ! empty($get))
                {
                    $first_url .= $query_string_sep.http_build_query($get);
                }
            }

            // Add the page segment to the end of the query string, where the
            // page number will be appended.
            $base_url .= $query_string_sep.http_build_query(array_merge($get, array($this->query_string_segment => '')));
        }
        else
        {
            // Standard segment mode.
            // Generate our saved query string to append later after the page number.
            if ( ! empty($get))
            {
                $query_string = $query_string_sep.http_build_query($get);
                $this->suffix .= $query_string;
            }

            // Does the base_url have the query string in it?
            // If we're supposed to save it, remove it so we can append it later.
            if ($this->reuse_query_string === TRUE && ($base_query_pos = strpos($base_url, '?')) !== FALSE)
            {
                $base_url = substr($base_url, 0, $base_query_pos);
            }

            if ($first_url === '')
            {
                $first_url = $base_url.$query_string;
            }

            $base_url = rtrim($base_url, '/').'/';
        }

        $base_page = ($this->use_page_numbers) ? 1 : 0;

        if ($this->page_query_string === TRUE)
        {
            $this->cur_page = $this->CI->input->get($this->query_string_segment);
        }
        elseif (empty($this->cur_page))
        {
            // Default to the last segment number if one hasn't been defined.
            if ($this->uri_segment === 0)
            {
                $this->uri_segment = count($this->CI->uri->segment_array());
            }

            $this->cur_page = $this->CI->uri->segment($this->uri_segment);

            // Remove any specified prefix/suffix from the segment.
            if ($this->prefix !== '' OR $this->suffix !== '')
            {
                $this->cur_page = str_replace(array($this->prefix, $this->suffix), '', $this->cur_page);
            }
        }
        else
        {
            $this->cur_page = (string) $this->cur_page;
        }

        if ( ! ctype_digit($this->cur_page) OR ($this->use_page_numbers && (int) $this->cur_page === 0))
        {
            $this->cur_page = $base_page;
        }
        else
        {
            // Make sure we're using integers for comparisons later.
            $this->cur_page = (int) $this->cur_page;
        }

        if ($this->use_page_numbers)
        {
            if ($this->cur_page > $num_pages)
            {
                $this->cur_page = $num_pages;
            }
        }
        elseif ($this->cur_page > $this->total_rows)
        {
            $this->cur_page = ($num_pages - 1) * $this->per_page;
        }

        $uri_page_number = $this->cur_page;

        if ( ! $this->use_page_numbers)
        {
            $this->cur_page = (int) floor(($this->cur_page/$this->per_page) + 1);
        }

        $start	= (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end	= (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        $output = '';

        if ($this->first_link !== FALSE && $this->cur_page > ($this->num_links + 1 + ! $this->num_links))
        {

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, 1);

            $output .= $this->first_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$first_url.'\')"'.$attributes.$this->_attr_rel('start').'>'
                .$this->first_link.'</a>'.$this->first_tag_close;
        }

        if ($this->prev_link !== FALSE && $this->cur_page !== 1)
        {
            $i = ($this->use_page_numbers) ? $uri_page_number - 1 : $uri_page_number - $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, ($this->cur_page - 1));

            if ($i === $base_page)
            {
                // First page
                $output .= $this->prev_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$first_url.'\')"'.$attributes.$this->_attr_rel('prev').'>'
                    .$this->prev_link.'</a>'.$this->prev_tag_close;
            }
            else
            {
                $append = $this->prefix.$i.$this->suffix;
                $output .= $this->prev_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$base_url.$append.'\')"'.$attributes.$this->_attr_rel('prev').'>'
                    .$this->prev_link.'</a>'.$this->prev_tag_close;
            }

        }

        if ($this->display_pages !== FALSE)
        {
            // Write the digit links
            for ($loop = $start - 1; $loop <= $end; $loop++)
            {
                $i = ($this->use_page_numbers) ? $loop : ($loop * $this->per_page) - $this->per_page;

                $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $loop);

                if ($i >= $base_page)
                {
                    if ($this->cur_page === $loop)
                    {
                        // Current page
                        $output .= $this->cur_tag_open.$loop.$this->cur_tag_close;
                    }
                    elseif ($i === $base_page)
                    {
                        // First page
                        $output .= $this->num_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$first_url.'\')"'.$attributes.$this->_attr_rel('start').'>'
                            .$loop.'</a>'.$this->num_tag_close;
                    }
                    else
                    {
                        $append = $this->prefix.$i.$this->suffix;
                        $output .= $this->num_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$base_url.$append.'\')"'.$attributes.'>'
                            .$loop.'</a>'.$this->num_tag_close;
                    }
                }
            }
        }

        if ($this->next_link !== FALSE && $this->cur_page < $num_pages)
        {
            $i = ($this->use_page_numbers) ? $this->cur_page + 1 : $this->cur_page * $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $this->cur_page + 1);

            $output .= $this->next_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$base_url.$this->prefix.$i.$this->suffix.'\')"'.$attributes
                .$this->_attr_rel('next').'>'.$this->next_link.'</a>'.$this->next_tag_close;
        }

        if ($this->last_link !== FALSE && ($this->cur_page + $this->num_links + ! $this->num_links) < $num_pages)
        {
            $i = ($this->use_page_numbers) ? $num_pages : ($num_pages * $this->per_page) - $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $num_pages);

            $output .= $this->last_tag_open.'<a href="javascript:;" onclick="getAjaxPageData(\''.$base_url.$this->prefix.$i.$this->suffix.'\')"'.$attributes.'>'
                .$this->last_link.'</a>'.$this->last_tag_close;
        }

        $output = preg_replace('#([^:"])//+#', '\\1/', $output);

        return $this->full_tag_open.$output.$this->full_tag_close;
    }
}
