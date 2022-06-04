<style> 
@import url("https://fonts.googleapis.com/css?family=Bevan");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
	
}

body {
    background: rgb(40,40,40);
    overflow: hidden;
}

p {
    font-family: "Bevan", cursive;
    font-size: 130px;
    margin: 10vh 0 0;
    text-align: center;
    letter-spacing: 5px;
    background-color: black;
    color: transparent;
    text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.1);
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;

    span {
        font-size: 1.2em;
    }
}

code {
    color: #bdbdbd;
    text-align: center;
    display: block;
    font-size: 16px;
    margin: 0 30px 25px;

    span {
        color: #f0c674;
    }

    i {
        color: #b5bd68;
    }

    em {
        color: #b294bb;
        font-style: unset;
    }

    b {
        color: red;
        font-weight: 500;
    }
}

code b{
		color:red;
	}
code i{
      color: #b5bd68;
    }
code     em {
        color: #00FF7F;
        font-style: unset;
    }
	
code     i {
        color: #b5bd68;
    }
code     x {
        color: 	#00FFFF;
    }
a {
    color: #8abeb7;
    font-family: monospace;
    font-size: 20px;
    text-decoration: underline;
    margin-top:10px;
    display:inline-block
}

@media screen and (max-width: 880px) {
    p {
        font-size: 14vw;
    }
}
</style>
<p>HTTP: <span>404</span></p>
<code><span>this_page</span>.<em>not_found</em> = <x>true</x>;</code>
<code><span>if</span> (<b><i>Hati yang anda tuju tidak dapat diakses</i></b>) {<span>try_again()</span>;}</code>
<code><span>else if (<b><i>No Hope</i></b>)</span> {<em>alert</em>(<b>"You better go home"</b>); <span>window</span>.<em>location</em> = home;}</code>
<center><a href="<?php echo base_url();?>">HOME</a></center>
<script>
function type(n, t) {
    var str = document.getElementsByTagName("code")[n].innerHTML.toString();
    var i = 0;
    document.getElementsByTagName("code")[n].innerHTML = "";

    setTimeout(function() {
        var se = setInterval(function() {
            i++;
            document.getElementsByTagName("code")[n].innerHTML =
                str.slice(0, i) + "|";
            if (i == str.length) {
                clearInterval(se);
                document.getElementsByTagName("code")[n].innerHTML = str;
            }
        }, 10);
    }, t);
}

type(0, 0);
type(1, 600);
type(2, 1300);
</script>