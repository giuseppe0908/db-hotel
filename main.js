Vue.config.devtools = true;
var app = new Vue({
  el: '#root',
  data: {
    query:[],
    stanza_info: [],
    flag: false,

  },

  created(){
    axios.get('http://localhost:8888/db-hotel/query.php')
        .then((response) =>{
          // console.log(response.data);
          this.query = response.data;
        });
  },
  methods: {
    click_id: function(id){
     this.flag = true;
      axios.get(`http://localhost:8888/db-hotel/query.php?id=${id}`)
          .then((response) =>{
            this.stanza_info = response.data[0];

        });
    }

  }

});
