<?php
/*
Plugin Name: Kanye Quotes
Description: Plugin to display Kanye quotes.
Version: 1.0
Author: Mazhar Naseer
*/

function display_kanye_quotes($atts, $content = null) {
    $api_url = 'https://api.kanye.rest/';

    $quotes = array();
    for ($i = 0; $i < 5; $i++) {
        $response = wp_remote_get($api_url);
        if (!is_wp_error($response)) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
            if ($data && isset($data->quote)) {
                $quotes[] = $data->quote;
            }
        }
    }

    $html = '<div class="container kanye-quotes section-padding">';
    foreach ($quotes as $quote) {
        $html .= '<div class="quote-box px-3 py-3">
                    <p class="quotation-mark">“</p>
                    <p class="quote-text">' . esc_html($quote) . '</p>
                    <hr>
                    <div class="blog-post-actions">
                        <p class="blog-post-bottom pull-left">Kanye West</p>
                    </div>
                </div>';
    }
    $html .= '</div>';
    return $html;
}

add_shortcode('kanye_quotes', 'display_kanye_quotes');
?>
<style>
.quote-box {
    margin-top: 30px;
    border-radius: 17px;
    background-color: #37517e;
    color: white;
    width: 325px;
    box-shadow: 2px 2px 2px 2px #E0E0E0;
}

.quotation-mark {
    font-weight: bold;
    font-size: 100px;
    color: white;
    font-family: "Times New Roman", Times, Serif;
    margin-top: 10px;
}

.quote-text {
    font-size: 19px;
}

.blog-post-actions {
    margin-bottom: 10px;
}

.blog-post-bottom {
    margin: 0;
}

.pull-left {
    float: left;
}

.pull-right {
    float: right;
}

.quote-badge {
    background-color: rgba(0, 0, 0, 0.2);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    margin-left: 5px;
}
.kanye-quotes {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Adjust as needed */
}

.quote-box {
    width: calc(50% - 10px); /* Adjust as needed */
    margin-bottom: 20px; /* Adjust as needed */
    /* Other styles */
}

</style>