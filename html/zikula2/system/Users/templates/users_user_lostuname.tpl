{gt text='Account information recovery' assign='templatetitle'}
{modulelinks modname='Users' type='user'}
{include file='users_user_menu.tpl'}

<p class="z-informationmsg">{gt text="Please enter your e-mail address below and click the 'Submit' button. You will be sent an e-mail with your account information."}</p>

<form class="z-form" action="{modurl modname='Users' type='user' func='lostUname'}" method="post">
    <div>
        <input type="hidden" id="lostunamecsrftoken" name="csrftoken" value="{insert name='csrftoken'}" />
        <fieldset>
            <div class="z-formrow">
                <label for="users_email">{gt text='E-mail address'}</label>
                <input id="users_email" type="text" name="email" size="40" maxlength="60" value="{$email|safetext}" />
            </div>
        </fieldset>
        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Submit' __title='Submit' __text='Submit'}
        </div>
    </div>
</form>
