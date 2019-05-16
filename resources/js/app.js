new Vue({
    el: '#app',
    created: function(){
        this.getAll()
        this.getSelectPie()
    },
    data: {
        processes:[],
        description: "",
        department: "",
        municipality: "",
        errors: [],
        id: "",
        start_date: "",
        end_date: "",
        state_id: "",
        observation: "",
        labels: [
            "Creado",
            "Aprobado",
            "No Aprobado",
            "Finalizado"
          ],
        dataPie:[],
    },    
    methods: {
        getAll: function(page){
            var urlProcesses = "processes"
            axios.get(urlProcesses).then(response => {
               this.processes = response.data
            })
        },
        getSelectPie: function(page){
            var urlPie = "selectPie"
            axios.get(urlPie).then(response => {
               this.dataPie = response.data
               this.startPie(this.$refs.canvas, 'pie', this.dataPie)
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
        saveDates: function(id){
            var urlSaveDates = "../saveDates"
            axios.get(urlSaveDates, {
                params: {
                    id: id,
                    start_date: this.start_date,
                    end_date: this.end_date
                }
            }).then(response => {
                this.start_date = ""
                this.end_date = ""
                toastr.success("Guardado Correctamente")
                setTimeout((function() {
                    window.location.reload();
                }), 2000);
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        },
        saveStates: function(id){
            var urlSaveStates = "../saveStates"
            axios.get(urlSaveStates, {
                params: {
                    id: id,
                    state_id: this.state_id,
                    observation: this.observation
                }
            }).then(response => {
                this.state_id = ""
                this.observation = ""
                toastr.success("Guardado Correctamente")
                setTimeout((function() {
                    window.location.reload();
                }), 2000);
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        },
        finalizeState: function(id){
            var urlFinalizeState = "../finalizeState"
            axios.get(urlFinalizeState, {
                params: {
                    id: id,
                    state_id: this.state_id,
                }
            }).then(response => {
                this.state_id = ""
                toastr.success("Guardado Correctamente")
                setTimeout((function() {
                    window.location.reload();
                }), 2000);
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        },
        startPie: function(canvas, type, data){
            let chart = new Chart(canvas, {
              type: type,
              data: {
                labels: this.labels,
                datasets: [
                {
                    data: data,
                    backgroundColor: [
                      "#007bff",
                      "#28a745",
                      "#dc3545",
                      "#ffc107"
                    ],
                    hoverBackgroundColor: [
                      "#007bff",
                      "#28a745",
                      "#dc3545",
                      "#ffc107"
                    ]
                  }]
                },
                options: {
                    animation:{
                        animateScale:true
                    }
                }
            })
        }
    }
})