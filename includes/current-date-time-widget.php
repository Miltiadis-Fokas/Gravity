<?php
if ( !class_exists( 'CurrentDateTimeWidget' ) ) {
	class CurrentDateTimeWidget {
		var $optionName = "widget_current_date_time";
		
		
		function CurrentDateTimeWidget() {
			add_action( $this, 'init'  );
		}
		
		function init() {
			if ( !function_exists( 'register_sidebar_widget' ) )
				return;
			
			register_sidebar_widget(__( 'Current Date & Time' ), array( $this, 'render' ) );
			register_widget_control(__( 'Current Date & Time' ), array( $this, 'control' ) );
		}
		
		function render() {
			$options = get_option( $this->optionName );
			
			$title = attribute_escape( $options['title'] );
			$timezone = attribute_escape( $options['timezone'] );
			$format = attribute_escape( $options['format'] );
			
			if ( '' == $format )
				$format = 'l, F j, g:i a';
			
			if ( '' != $timezone )
				date_default_timezone_set( $timezone );
			
			$currentDate = date( $format );
			
			
			echo $before_widget;
			
			if ( '' != $title )
				echo $before_title . $title . $after_title;
			
			echo '<p id="current-date-time">' . $currentDate . '</p>';
			echo $after_widget;
		}
		
		function control() {
			global $_POST;
			
			
			$options = $newoptions = get_option( $this->optionName );
			
			if ( $_POST['current-date-time-submit'] ) {
				$newoptions['title'] = strip_tags( stripslashes( $_POST['current-date-time-title'] ) );
				$newoptions['timezone'] = strip_tags( stripslashes( $_POST['current-date-time-timezone'] ) );
				$newoptions['format'] = strip_tags( stripslashes( $_POST['current-date-time-format'] ) );
			}
			
			if ( $options != $newoptions ) {
				$options = $newoptions;
				update_option( $this->optionName, $options );
			}
			
			$title = attribute_escape( $options['title'] );
			$timezone = attribute_escape( $options['timezone'] );
			$format = attribute_escape( $options['format'] );
			
			if ( '' == $format )
				$format = 'l, F j, g:i a';
			
?>
	<p><label for="current-date-time-title"><?php _e('Title:') ?></label> <input type="text" class="widefat" id="current-date-time-title" name="current-date-time-title" value="<?php echo $title ?>" /></p>
	<p><label for="current-date-time-timezone"><?php _e('Timezone:') ?></label> <a href="http://us3.php.net/timezones" target="timezones">valid timezones</a> <input type="text" class="widefat" id="current-date-time-timezone" name="current-date-time-timezone" value="<?php echo $timezone ?>" /></p>
	<p><label for="current-date-time-format"><?php _e('Format:') ?></label> <a href="http://us.php.net/date" target="formats">date formats</a> <input type="text" class="widefat" id="current-date-time-format" name="current-date-time-format" value="<?php echo $format ?>" /></p>
	<input type="hidden" name="current-date-time-submit" id="current-date-time-submit" value="1" />
<?php
			
		}
	}
}

if ( class_exists( "CurrentDateTimeWidget" ) ) {
	$currentDateTimeWidget = new CurrentDateTimeWidget();
}

?>
