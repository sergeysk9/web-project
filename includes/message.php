<?php

if(($msg !="")&&(strpos($msg,"!")))
{
print('<h4 class="green">');

?>
<script>
 noty({
      text: '<?php echo $msg; ?>',
      layout: 'center',

      animation: {
        open: 'animated flipInX', // Animate.css class names
        close: 'animated flipOutX', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },

      closeWith: ['click'],
      timeout: 2500,
      type: 'alert'

   });
</script>

<?php

print('</h4>');
}
elseif(($msg !="")&&( strpos($msg,"!")==0) )
{
  print('<h4 class="green">');

?>
<script>
 noty({
      text: '<?php echo $msg; ?>',
      layout: 'center',

        animation: {
        open: 'animated flipInX', // Animate.css class names
        close: 'animated flipOutX', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },

    closeWith: ['click'], //
      timeout: 2500,
      type: 'success'

   });
</script>

<?php

print('</h4>');

}

?>
