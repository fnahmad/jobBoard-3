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
      await axios.patch(`/api/${this.namespace}`, payload)
    },
    async _$fetch ({id}) {
      await axios.get(`/api/${this.namespace}/${id}`)
    },
    async _$editHelper (data) {
      this.$modal.show(`bo_${this.namespace}`, {data})
    }
  }
}