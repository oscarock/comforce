new Vue({
    el: '#app',
    created: function(){
        this.getAll()
    },
    data: {
      
    },
    
    methods: {
        getAll: function(page){
            var urlsuperhero = "api/superheros?page=" + page
            axios.get(urlsuperhero).then(response => {
                this.superhero = response.data.superheros.data
                this.pagination = response.data.pagination
            })
        },
    }
})