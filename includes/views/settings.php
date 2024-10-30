<?php if (isset($result)) { ?>
    <div class="wrap">
        <?php if ($result->success) { ?>
            <div class="message updated">
                <p>Settings Saved</p>
            </div>
        <?php } else { ?>
            <div class="message error">
                <p><?php echo $result->error_message ?></p>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<div class="wrap">
    <h1>DIDI Connection Settings</h1>
    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label class="wp-heading-inline" id="title" for="title">Tenant Token</label>
                </th>
                <td>
                    <input type="text" name="<?php echo $this->settings->api_tenant_token; ?>" size="70"
                           value="<?php echo $this->settings->getApiTenantToken(); ?>" id="title"
                           required
                           autocomplete="off">
                </td>
            </tr>
            <tr>
                <th>
                    <label class="wp-heading-inline" id="title-prompt-text" for="title">
                        User Token
                    </label>
                </th>
                <td>
                    <input type="text" name="<?php echo $this->settings->api_user_token; ?>" size="70"
                           value="<?php echo $this->settings->getApiUserToken(); ?>" id="title"
                           required
                           spellcheck="true" autocomplete="off">
                </td>
            </tr>
            <tr>
                <th>
                    <label class="wp-heading-inline" id="title-prompt-text" for="title">Api Base URL</label>
                </th>
                <td>
                    <input type="text" name="<?php echo $this->settings->api_base_url; ?>" size="70"
                           required
                           value="<?php echo $this->settings->getApiBaseUrl(); ?>" id="title"
                           spellcheck="true" autocomplete="off">
                </td>
            </tr>
            <tr>
                <th>
                    <label class="wp-heading-inline" id="title-prompt-text" for="title">Charts Font</label>
                </th>
                <td>
                    <input type="text" name="<?php echo $this->settings->graphic_font; ?>" size="70"
                           required
                           value="<?php echo $this->settings->getGraphicsFont(); ?>" id="title"
                           spellcheck="true" autocomplete="off">
                </td>
            </tr>
            </tbody>
        </table>
        <input type="submit" name="save" value="Save" class="button button-primary button-large">
    </form>
</div>