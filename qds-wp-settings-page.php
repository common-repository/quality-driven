<div id="qds-wp" class="wrap">
    <div class="qds-logo">
        <img src="<?php echo plugin_dir_url(__FILE__) . 'logo.png' ?>" alt="logo" width="200">
        <hr>
    </div>

    <?php if (isset($_GET['settings-updated'])) { ?>
        <div class="alert alert-success">
            <p><strong><?php _e('Settings saved.') ?></strong></p>
        </div>
    <?php } ?>

    <!-- Tabs -->
    <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Settings</li>
        <li class="tab-link" data-tab="tab-2">Help</li>
        <li class="tab-link" data-tab="tab-3">Examples</li>
    </ul>

    <!-- Settings Tab -->
    <div id="tab-1" class="tab-content current">
        <h2>General Information</h2>
        <p>This plugin allows access to your Quality Driven data. Please visit <a
                    href="http://qualitydrivensoftware.com" target="_blank">qualitydrivensoftware.com</a> for
            information about the service.</p>

        <form method="post" action="options.php">
            <?php settings_fields('qds-wp'); ?>
            <?php do_settings_sections('qds-wp'); ?>
            <div class="form-group">
                <label for="qds-api-key">QDS API Key</label>
                <input type="text" name="qds-api-key" size="50"
                       placeholder="e.g.: a4d474983c77053238048d90a60ac434aa345c15"
                       value="<?php echo esc_attr(get_option('qds-api-key')); ?>"/>
                <p>Get your QDS API key from the QDS app by going to the <strong>Website Embed Code</strong> tab in the
                    <strong>Reviews</strong> section.</p>
            </div>
            <?php submit_button(); ?>
        </form>
    </div>

    <!-- Help Tab -->
    <div id="tab-2" class="tab-content">
        <h2>How to Embed QDS Reviews into a Page</h2>
        <p>This plugin provides the convenient <strong>[qds-reviews]</strong> shortcode, which allows you to embed your
            QDS reviews anywhere on your site.</p>

        <h4>Instructions</h4>
        <ol>
            <li>Save your QDS API Key in the Quality Driven Settings tab.</li>
            <li>Add <strong>[qds-reviews]</strong> on any page where you want your reviews to show up.</li>
            <li>Customize the look of your reviews by following the instructions below and reviewing the Examples tab.
            </li>
        </ol>

        <br><br>

        <h4>Optional Settings</h4>
        <p>The [qds-reviews] shortcode comes with a few extra options which allow you to customize the look of your
            reviews.</p>

        <table class="qds-table options-table">
            <thead>
            <tr>
                <th>Option Name</th>
                <th>Description</th>
                <th>Default</th>
                <th>Usage</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>star-color</td>
                <td>The ratings star color</td>
                <td><span style="color:#548ECA">★</span></td>
                <td>[qds-reviews star-color='548ECA']</td>
            </tr>
            <tr>
                <td>background-color</td>
                <td>Background color of each review box</td>
                <td style="background-color:#fcfcfc;border:1px solid #e7e7e7;">FCFCFC</td>
                <td>background-color='FCFCFC'</td>
            </tr>
            <tr>
                <td>border</td>
                <td>Show border around each review box</td>
                <td>Yes</td>
                <td>border='none' to disable</td>
            </tr>
            <tr>
                <td>shadow</td>
                <td>Shadow on each review box</td>
                <td>Off</td>
                <td>shadow='yes' to enable</td>
            </tr>
            <tr>
                <td>hide-summary</td>
                <td>Hide score summary and customer satisfaction rating</td>
                <td>Off</td>
                <td>hide-summary='yes' to hide the summary</td>
            </tr>
            <tr>
                <td>hide-city</td>
                <td>Hide the customer's city</td>
                <td>Off</td>
                <td>hide-city='yes' to hide the city</td>
            </tr>
            <tr>
                <td>hide-reviews</td>
                <td>Hide the review list so you can display just the summary</td>
                <td>Off</td>
                <td>hide-reviews='yes' to hide the review list</td>
            </tr>
            <tr>
                <td>limit</td>
                <td>Limit the number of reviews displayed</td>
                <td>10</td>
                <td>limit='n' to display the latest n reviews (e.g. limit='5')</td>
            </tr>
            <tr>
                <td>width</td>
                <td>Set width to medium or narrow width.</td>
                <td>full / responsive</td>
                <td>width='medium' or width='narrow'</td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Examples Tab -->
    <div id="tab-3" class="tab-content examples">
        <p>Copy and paste one of the following examples to get started.</p>

        <h3>Example 1 (default)</h3>
        <div class="form-group">
            <input value="[qds-reviews]" onfocus="this.select();">
            <img src="<?php echo plugin_dir_url(__FILE__) . 'review1.png' ?>" alt="Example review">
        </div>

        <h3>Example 2</h3>
        <div class="form-group">
            <input value="[qds-reviews star-color='D8B8FF' background-color='FCFCFC' shadow='yes']"
                   onfocus="this.select();">
            <img src="<?php echo plugin_dir_url(__FILE__) . 'review2.png' ?>" alt="Example review">
        </div>

        <h3>Example 3</h3>
        <div class="form-group">
            <input value="[qds-reviews star-color='333333' background-color='FCFCFC' border='none']"
                   onfocus="this.select();">
            <img src="<?php echo plugin_dir_url(__FILE__) . 'review3.png' ?>" alt="Example review">
        </div>

        <h2>Example Colors</h2>
        <p>Colors must be in Hex format without the # sign. For example, for black use <strong>'000000'</strong>.</p>
        <img src="<?php echo plugin_dir_url(__FILE__) . 'colors.png' ?>" alt="Example colors">
    </div>
</div>
<script>
    (function ($) {
        $(document).ready(function () {
            $('ul.tabs li').click(function () {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            });
        });
    })(jQuery);
</script>
