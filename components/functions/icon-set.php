<th scope="row">Icon Set:</th>
<td>
  <div>
    <select name="quasarwp-settings[icon-set]" id="quasarwp-settings-icon-set">
      <?php
      foreach ($iconSets as $key => &$iconSet) {
        echo '<option value="' . $key . '" ' . selected($options['icon-set'], $key) . '>' . $iconSet . '</option>';
      }
      ?>
    </select>
  </div>
</td>
