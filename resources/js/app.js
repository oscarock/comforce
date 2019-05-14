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
        start_date: "",
        end_date: ""
    },
    
    methods: {
        getAll: function(page){
            var urlProcesses = "processes"
            axios.get(urlProcesses).then(response => {
               this.processes = response.data
            })
        },
        createProcesses: function(){
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
        viewProcesses:function(processes){
            var urlShow = "processes/" + processes.id
            window.location.href = urlShow
        },
        saveDates: function(){
            console.log("entre")
        }
    }
})