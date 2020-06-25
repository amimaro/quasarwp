<th scope="row">Front Page:</th>
<td>
  <div>
    <label for="quasarwp-settings-frontpage-show-post-author">
      <input name="quasarwp-settings[frontpage-show-post-author]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-author'])); ?> id="quasarwp-settings-frontpage-show-post-author" />
      Show Author
    </label>
    <br>
    <label for="quasarwp-settings-frontpage-show-post-date">
      <input name="quasarwp-settings[frontpage-show-post-date]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-date'])); ?> id="quasarwp-settings-frontpage-show-post-date" />
      Show Post Date
    </label>
    <br>
    <label for="quasarwp-settings-frontpage-show-post-comments-counter">
      <input name="quasarwp-settings[frontpage-show-post-comments-counter]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-comments-counter'])); ?> id="quasarwp-settings-frontpage-show-post-comments-counter" />
      Show Comments Counter
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-frontpage-post-layout">Posts Layout:</label>
    <select name="quasarwp-settings[frontpage-post-layout]" id="quasarwp-settings-frontpage-post-layout">
      <option value="vertical" <?php selected($options['frontpage-post-layout'], 'vertical'); ?>>Vertical</option>
      <option value="horizontal" <?php selected($options['frontpage-post-layout'], 'horizontal'); ?>>Horizontal</option>
    </select>
  </div>
</td>
