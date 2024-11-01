<?php
/*
Plugin Name: Today widget
Plugin URI: http://www.thecodepharmacy.co.uk/
Description: Shows today's date
Author: David Clough
Version: 0.1
Author URI: http://www.thecodepharmacy.co.uk/
*/
 
 
class TodayWidget extends WP_Widget
{
  function TodayWidget()
  {
    $widget_ops = array('classname' => 'TodayWidget', 'description' => 'Displays todays date' );
    $this->WP_Widget('TodayWidget', 'Date', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = $instance['title'];
 
    if (!empty($title)){
      echo $before_title . $title . $after_title;
      }
 
    // WIDGET CODE GOES HERE
    echo '<p>'.date('jS F Y').'</p>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("TodayWidget");') );?>