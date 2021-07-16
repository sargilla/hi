<script>
    import Form from '../utilities/Form';
    import {mapActions} from 'vuex';
    export default {
        props: ['tipo'],
        data() {
            return {
                form: new Form({
                    email: '',
                    password:''
                }),
                'feedback': ''
            }
        },
        methods: {
            ...mapActions([
                'actualizarDatosEnvio'
            ]),
            onSubmit() { 
                this.form.post('/login')
                    .then( () => {
                        toastr.success('Ha ingresado como cliente correctamente')
                        window.location.reload()
                    })
                    .catch(errors => {
                        if(this.form.errors.has('error')){
                            this.feedback =  this.form.errors.get('error')
                        }
                    });  
            }
        }
    }
</script>
