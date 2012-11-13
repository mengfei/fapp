<div id="login" class="span9">
	<form method="post" action="/admin/default/login">
		<div class="row">
			<label class="span1">用 户 名:</label> <input type="text"
				placeholder="请输入用户名" name="LoginForm[username]" />
		</div>
		<div class="row">
			<label class="span1">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label> <input
				type="password" name="LoginForm[password]" />
		</div>
		<div class="row">
			<div class="span1"></div>
			<label class=" indent span3 checkbox"><input type="checkbox"
				name="LoginForm[rememberMe]"> 记住我 </label>
		</div>
		 <div class="row">
        	<div class="span1"></div>
        	<input class=" indent btn" type="submit" value="登陆"/>
        </div>
	</form>
</div>

