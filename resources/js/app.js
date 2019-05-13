new Vue({
    el: '#app',
    created: function(){
        this.getAll()
    },
    data: {
        processes:[]
    },
    
    methods: {
        getAll: function(page){
            var urlProcesses = "processes"
            axios.get(urlProcesses).then(response => {
               this.processes = response.data
            })
        },
    }
})