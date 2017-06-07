<?php
    /**
     * The template for the header sticky bar.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author        Redux Framework
     * @package       ReduxFramework/Templates
     * @version:      3.5.5
     */
?>
<div id="redux-sticky">
    <div id="info_bar">

        <a href="javascript:void(0);"
           class="expand_options<?php echo ( $this->parent->args['open_expanded'] ) ? ' expanded' : ''; ?>"<?php echo isset($this->parent->args['hide_expand']) ? ' style="display: none;"' : '' ?>><?php esc_html_e( 'Expand', 'lucian' ); ?></a>

        <div class="redux-action_bar">
            <span class="spinner"></span>
            <?php submit_button( esc_html__( 'Save Changes', 'lucian' ), 'primary', 'redux_save', false ); ?>
            <?php if ( false === $this->parent->args['hide_reset'] ) : ?>
                <?php submit_button( esc_html__( 'Reset Section', 'lucian' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'redux-defaults-section' ) ); ?>
                <?php submit_button( esc_html__( 'Reset All', 'lucian' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'redux-defaults' ) ); ?>
            <?php endif; ?>
        </div>
        <div class="redux-ajax-loading" alt="<?php esc_html_e( 'Working...', 'lucian' ) ?>">&nbsp;</div>
        <div class="clear"></div>
    </div>

    <!-- Notification bar -->
    <div id="redux_notification_bar">
        <?php $this->notification_bar(); ?>
    </div>


</div>