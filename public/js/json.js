var data; // a global
d3.json("../data/data.json", function(error, json) {
      if (error) return console.warn(error);
        data = json;
          visualizeit();
});

// <i class="fa fa-tint" aria-hidden="true"></i>