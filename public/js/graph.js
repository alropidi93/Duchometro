var fg = fg || {
  'version': 0.1,
  'controller': {},
  'viz': {}
};

fg.viz.appgraph = function(options){

  var self = {};

  for (var key in options) {
	  self[key] = options[key];
  }

  self.parentSelect = "#" + self.parentId;

  self.init = function(){
  self.margin = 0;
  self.height = self.height - 18;
  self.width = self.width;
  self.svg = d3.select(self.parentSelect)
    .append("svg")
	  .attr("id", "appgraph")
		.attr("width", self.width)
		.attr("height", self.height)
    .style("background",'#F7F7F7')
    .style("border-radius","3px")
    .style("border-bottom","3px solid #27C746");
  };

  self.prerender = function(){

    var data = self.data;
    self.max = d3.max(data,function(d){ return d.val; });
    self.minx = d3.min(data,function(d){ return d.idx; });
    self.maxx = d3.max(data,function(d){ return d.idx; });
    self.scalar = d3.scale.linear()
      .domain([0,self.max])
      .range([0,self.height]);
    self.sep = d3.scale.linear()
      .domain([self.minx, self.maxx])
      .range([0,self.width]);
    self.low = self.height - 30;

    console.log(self.minx);
    console.log(self.maxx);
    
    self.polygon_first = self.svg.selectAll('.tag')
      .data([data])
      .enter()
      .append('polygon')
      .attr('fill','#7ADD8D')
      .attr('points',function(d){
        var points = "";
        points += "0,"+self.height+" ";
        for( var i = 0 ; i < d.length ; i++ ){
           points += self.sep(d[i].idx) +','+(self.height-self.scalar(d[i].val))+' ';
        }
        points += self.width+","+self.height;
        return points;
      });
  };

	self.render = function(){
	};

	self.init();
	return self;
};

var fedoraviz = fg.viz.appgraph({
	parentId : "graph",
  data: data,
	width : $('#graph').width(),
	height: $('#graph').height()
});

fedoraviz.prerender();
fedoraviz.render();
