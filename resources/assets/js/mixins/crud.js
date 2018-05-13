export default {
  methods: {
    async _$delete ({id}) {
      await this.$swal({
          title: 'Voulez-vous réelement supprimer cette ressource ?',
          text: 'Cette action ne peut pas être annulée',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirmer la suppression !',
          cancelButtonText: 'Annuler',
          showCloseButton: true,
          showLoaderOnConfirm: true
        })
        .then(async (result) => {
          if(result.value) {
            await axios.delete(`/api/${this.namespace}/${id}`)
            this.$swal('Deleted', 'Ressource supprimée avec succès', 'success')
          }
        }) 
    },
    async _$edit (payload) {
      return axios.patch(`/api/${this.namespace}/${payload.id}`, payload)
    },
    async _$fetch ({id}) {
      await axios.get(`/api/${this.namespace}/${id}`)
    },
    async _$editHelper (data, callback) {
      this.$modal.show(`bo`, {data, callback})
    }
  }
}