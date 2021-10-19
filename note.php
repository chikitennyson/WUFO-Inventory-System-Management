<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>
  <head>
  </head>
  <style>
  body {
  margin: 20px auto;
  font-family: 'Lato';
  background:#666;
  color:#fff;
}

*{
  margin:0;
  padding:0;
}

h2 {
  font-weight: bold;
  font-size: 2rem;
}
p {
  font-family: 'Reenie Beanie';
  font-size: 2rem;
}
ul,li{
  list-style:none;
}
ul{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
ul li a{
  text-decoration:none;
  color:#000;
  background:#ffc;
  display:block;
  height:10em;
  width:10em;
  padding:1em;
  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  transform: rotate(-6deg);
  transition: transform .15s linear;
}

ul li:nth-child(even) a{
  transform:rotate(4deg);
  position:relative;
  top:5px;
  background:#cfc;
}
ul li:nth-child(3n) a{
  transform:rotate(-3deg);
  position:relative;
  top:-5px;
  background:#ccf;
}
ul li:nth-child(5n) a{
  transform:rotate(5deg);
  position:relative;
  top:-10px;
}

ul li a:hover,ul li a:focus{
  box-shadow:10px 10px 7px rgba(0,0,0,.7);
  transform: scale(1.25);
  position:relative;
  z-index:5;
}

ul li{
  margin:1em;
}
</style>
<ul>
  <li>
    <a href="#" contenteditable>
      <h2>Title #1</h2>
      <p>Text Content #1</p>
    </a>
  </li>

</ul>
</body>
</html>
<script>
$(document).ready(function () {
  all_notes = $("li a");

  all_notes.on("keyup", function () {
    note_title = $(this).find("h2").text();
    note_content = $(this).find("p").text();

    item_key = "list_" + $(this).parent().index();

    data = {
      title: note_title,
      content: note_content
    };

    window.localStorage.setItem(item_key, JSON.stringify(data));
  });

  all_notes.each(function (index) {
    data = JSON.parse(window.localStorage.getItem("list_" + index));

    if (data !== null) {
      note_title = data.title;
      note_content = data.content;

      $(this).find("h2").text(note_title);
      $(this).find("p").text(note_content);
    }
  });
});
</script>
