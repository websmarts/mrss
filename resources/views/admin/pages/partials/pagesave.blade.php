<script>
// jQuery Page Save Handler
      $( document ).ready(function() {

        function strip_domain_name(content){
          return content.replace(current_domain, "")
        }

        function findItemById(id,data) {
          var found = _.find(data,['id',id])
          if(!found){
              data.push({id: id})
          }
          return _.find(data,['id',id])
        }



        // click handler for save_button
        $('#save_button').on('click', function(event) {
          event.preventDefault();
          save_page_elements();
        });

        var save_page_elements = function() {
          let data = []

          for(i=0; i<tinymce.editors.length; i++){
              // console.log($(tinymce.editors[i].targetElm).attr('name'));
              // console.log(tinymce.editors[i].getContent() );

              var name = $(tinymce.editors[i].targetElm).attr('name')
              var id = parseInt(name.replace('element_',''))
              var item = findItemById(id,data)

              item.content = strip_domain_name(tinymce.editors[i].getContent())
          }

        // get all the image filepath elements
        // The id has the key to the element_id
        $('input.lfm-input').each(function(index,elm){
          var id = parseInt($(elm).attr('id').replace('element_',''))
          var item = findItemById(id,data)
          item.content = strip_domain_name($(elm).val())
        })

        //console.log(data)

        let postdata = {
          data: data
        }

        // Performing a POST request
        axios.post(save_url, postdata)
          .then(function(response){
            alert('saved successfully')
          });
    }
  })
</script>
