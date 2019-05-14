new Vue({
    el: '#app',
    created: function(){
        this.getAll()
    },
    data: {
        processes:[],
        description: "",
        department: "",
        municipality: "",
        errors: [],
    },
    
    methods: {
        getAll: function(page){
            var urlProcesses = "processes"
            axios.get(urlProcesses).then(response => {
               this.processes = response.data
            })
        },
        createProcesses: function(){
            //console.log("entre")
            var urlCreate = "processes"
            axios.post(urlCreate, {
                description: this.description,
                department: this.department,
                municipality: this.municipality,
            }).then(response => {
                this.getAll()
                this.description = ""
                this.department = ""
                this.municipality = ""
                this.errors = []
                $("#create").modal("hide")
                toastr.success("Agregado Correctamente")
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        },
    }
})