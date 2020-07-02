window.onload = function () {
   getUsuarios();
   getEvento();
   listarEventos();
   checkPerfil();
}

function checkPerfil() {
   let varUser = document.getElementById('perfilUser');
   let varEvento = document.getElementById('perfilEvento');
   let varEditUser = document.getElementById('editUser');
   let varEditEvento = document.getElementById('editEvento');
   if (varUser != null) {
      console.log(varUser)
      perfilUsuario();
   } else if (varEvento != null) {
      console.log(varEvento)
      perfilEvento();
   } else if (varEditUser != null) {
      console.log(varEditUser)
      editUsuario();
   } else if (varEditEvento != null) {
      console.log(varEditEvento)
      editEventos()
   }
}

function loading() {
   let loading = document.querySelector('#loading');
   let form = document.querySelector('#form div');
   loading.classList.toggle('none');
   form.classList.toggle('none');
   setInterval(() => {
      redirect()
   }, 650);
}

function goBack() {
   window.history.back();
}

function redirect() {
   document.location.href = "/Back-End/index";
}

function deletEventos() { }

function perfilUsuario() {
   let urlUser = window.location.href;
   let numberId = urlUser.split("/");
   console.log("number: ", numberId)
   console.log("last: ", numberId.slice(-1).pop())
   let idFinal = numberId.slice(-1).pop();
   fetch('http://localhost/Back-End/usuario/' + idFinal)
      .then(response => response.json())
      .then(data => {
         console.log('perfil user: ', data);
         let perfilUser = $('#perfilUser');
         perfilUser.append(
            "<div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Nome: </label> <span>" + data.nome + "</span> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Telefone: </label> <span>" + data.telefone + "</span> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Email: </label> <span>" + data.email + "</span> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Data de Nascimento: </label> <span>" + data.data_nascimento + "</span> </div> </div> </div> <div class='form-group'> <div class='clearfix'> <button class='btn btn-warning float' onclick='location.href='/Back-End/editUsuario" + data.id + "' title ='editar' > Editar <span>&nbsp;</span> <i class='fas fa-edit'></i> </button> <button class='btn btn-danger float mr-2' onclick='location.href='/Back-End/editUsuario" + data.id + "' title ='deletar' > Deletar <span>&nbsp;</span> <i class='fas fa-delete'></i> </button> <button class='btn btn-info float mr-2' onclick='goBack()'> <i class='fas fa-arrow-left'></i> <span>&nbsp;</span> voltar </button> </div > </div > "
         )
      })
}

function editUsuario() {
   let urlUser = window.location.href;
   let numberId = urlUser.split("/");
   console.log("number: ", numberId)
   console.log("last: ", numberId.slice(-1).pop())
   let idFinal = numberId.slice(-1).pop();
   fetch('http://localhost/Back-End/usuario/' + idFinal)
      .then(response => response.json())
      .then(data => {
         console.log('perfil user: ', data);
         let perfilUser = $('#editUser');
         perfilUser.append(
            "<div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Nome: </label>  <input type='text' class='form-control' name='nome' value='" + data.nome + "' />  </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Telefone: </label> <input type='text' class='form-control' name='telefone' value='" + data.telefone + "' /> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Email: </label> <input type='text' class='form-control' name='email' value='" + data.email + "' /> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Data de Nascimento: </label> <input type='text' class='form-control' name='data_nascimento' value='" + data.data_nascimento + "' />  </div> </div> </div> <div class='form-group'> <div class='clearfix'> <button class='btn btn-info float' onclick='goBack()'> <i class='fas fa-arrow-left'></i> <span>&nbsp;</span> voltar </button> </div> </div>"
         )
      })
}

function perfilEvento() {
   let urlUser = window.location.href;
   let numberId = urlUser.split("/");
   console.log("number: ", numberId)
   console.log("last: ", numberId.slice(-1).pop())
   let idFinal = numberId.slice(-1).pop();
   fetch('http://localhost/Back-End/evento/' + idFinal)
      .then(response => response.json())
      .then(data => {
         console.log('perfil user: ', data);
         let perfilEvento = $('#perfilEvento');
         perfilEvento.append(
            "<div class='row'> <div class='col-sm-4'> <div class='form-group'> <label>Nome: </label> <span>" + data.nome + "</span> </div> </div> <div class='col-sm-8'> <div class='form-group'> <label>Endereço: </label> <span>" + data.endereco + "</span> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Data: </label> <span>" + data.data_inicio + "</span> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Hora do ínicio: </label> <span>" + data.hora_inicio + "</span> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Hora final: </label> <span>" + data.hora_final + "</span> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Vagas existente: </label> <span>" + data.vagas + "</span> </div> </div> </div> <div class='form-group'> <div class='clearfix'> <button class='btn btn-info float' onclick='goBack()'> <i class='fas fa-arrow-left'></i> <span>&nbsp;</span> voltar </button> </div> </div>"
         )
      })
}

function editEventos() {
   let urlUser = window.location.href;
   let numberId = urlUser.split("/");
   console.log("number: ", numberId)
   console.log("last: ", numberId.slice(-1).pop())
   let idFinal = numberId.slice(-1).pop();
   fetch('http://localhost/Back-End/evento/' + idFinal)
      .then(response => response.json())
      .then(data => {
         console.log('perfil user: ', data);
         let perfilEvento = $('#editEvento');
         perfilEvento.append(
            "<div class='row'> <div class='col-sm-4'> <div class='form-group'> <label>Nome: </label> <input type='text' class='form-control' name='nome' value='" + data.nome + "' /> </div> </div> <div class='col-sm-8'> <div class='form-group'> <label>Endereço: </label> <input type='text' class='form-control' name='endereco' value='" + data.endereco + "' /> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Data: </label> <input type='text' class='form-control' name='data_inicio' value='" + data.data_inicio + "' /> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Hora do ínicio: </label> <input type='text' class='form-control' name='hora_inicio' value='" + data.hora_inicio + "' /> </div> </div> </div> <div class='row'> <div class='col-sm-6'> <div class='form-group'> <label>Hora final: </label> <input type='text' class='form-control' name='hora_final' value='" + data.hora_final + "' /> </div> </div> <div class='col-sm-6'> <div class='form-group'> <label>Vagas existente: </label> <input type='text' class='form-control' name='vagas' value='" + data.vagas + "' /> </div> </div> </div> <div class='form-group'> <div class='clearfix'> <button class='btn btn-primary float' value='Enviar' onclick='setUsuarios()'> Cadastrar <span>&nbsp;</span> <i class='fas fa-check'> </i> </button> <button class='btn btn-info float mr-2' onclick='goBack()'> <i class='fas fa-arrow-left'></i> <span>&nbsp;</span> voltar </button> </div> </div>"
         )
      })
}

function getUsuarios() {
   fetch('http://localhost/Back-End/usuario')
      .then(response => response.json())
      .then(data => {
         console.log('users: ', data);
         for (let i = 0; i < data.length; i++) {
            let dadoUser = $('#users')
            dadoUser.append(
               "<div class='card'> <h5 class='card-title'>" + data[i].nome + "</h5> <div class='card-body photo-profile'> <i class='fas fa-user'></i> </div> <a class='btn btn-primary float' href='/Back-End/perfilUsuario/" + data[i].id + "'> ver mais <span>&nbsp;</span> <i class='fas fa-long-arrow-alt-right'></i> </a>"
            )
         };
      })
}

function getEvento() {
   fetch('http://localhost/Back-End/evento')
      .then(response => response.json())
      .then(data => {
         console.log('evento: ', data);
         for (let i = 0; i < data.length; i++) {
            let dadoEvento = $('#event')
            dadoEvento.append(
               "<div class='card'> <h5 class='card-title'>" + data[i].nome + "</h5> <div class='card-body'> <div class='row'> <div class='col-sm-4'> <p> <span>Hora: </span> <span>" + data[i].hora_inicio + "</span> </p> </div> <div class='col-sm-8'> <p> <span>Endereço: </span> <span>" + data[i].endereco + "</span> </p> </div> </div> <div class='row'> <div class='col-sm-6'> <span>Data: </span> <span>" + data[i].data_inicio + "</span> </div> <div class='col-sm-6'> <span>Vagas restantes: </span> <span class='resto'>" + data[i].vagas + "</span> </div> </div> </div> <a class='btn btn-primary float' href='/Back-End/perfilEvento/" + data[i].id + "'> ver evento <span>&nbsp;</span> <i class='fas fa-long-arrow-alt-right'></i> </a> </div>"
            )
         };
      })
}

function listarEventos() {
   fetch('http://localhost/Back-End/evento')
      .then(response => response.json())
      .then(data => {
         console.log('lista de evento: ', data);
         for (let i = 0; i < data.length; i++) {
            let dadoEvento = $('#listEvento')
            dadoEvento.append(
               "<tr> <th scope='row'>1</th> <td>" + data[i].nome + "</td> <td>" + data[i].endereco + "</td> <td>" + data[i].decricao + "</td> <td>" + data[i].data + "</td> <td>" + data[i].hora_inicio + "</td> <td>" + data[i].hora_final + "</td> <td>" + data[i].vagas + "</td> <td> <div class='options'> <a class='btn btn-warning btn-sm' title='editar' href='/Back-End/editEvento/" + data[i].id + "'> <i class='fas fa-edit'></i> </a> <button class='btn btn-danger btn-sm' title='deletar' onclick='deletEventos()'> <i class='fas fa-trash'></i> </button> </div> </td> </tr>"
            )
         };
      })
}

function setUsuarios() {
   var form = document.querySelector('#addUsuario');
   var data = {};
   data['nome'] = form.nome.value
   data['senha'] = form.senha.value;
   data['telefone'] = form.telefone.value;
   data['data_nascimento'] = form.data.value;
   data['email'] = form.email.value;
   console.log(JSON.stringify(data));

   fetch('http://localhost/Back-End/usuario', {
      method: 'POST',
      body: JSON.stringify(data)
   })
      .then((response) => {
         if (response.ok) {
            goBack();
            return response.json()
         } else {
            return Promise.reject({ status: res.status, statusText: res.statusText });

         }

      })
      .then((data) => console.log(data))
      .catch(err => console.log('Error message:', err.statusText));
}

function setEvento() {
   var form = document.querySelector('#addEvento');
   var data = {};
   data['nome'] = form.nome.value
   data['data_inicio'] = form.data_inicio.value;
   data['data_final'] = form.data_final.value;
   data['endereco'] = form.endereco.value;
   data['vagas'] = form.vagas.value;
   data['hora_inicio'] = form.hora_inicio.value;
   data['hora_final'] = form.hora_final.value;
   data['decricao'] = form.decricao.value;
   console.log(JSON.stringify(data));

   fetch('http://localhost/Back-End/evento', {
      method: 'POST',
      body: JSON.stringify(data)
   })
      .then((response) => {
         if (response.ok) {
            goBack();
            return response.json()
         } else {
            return Promise.reject({ status: res.status, statusText: res.statusText });
         }

      })
      .then((data) => console.log(data))
      .catch(err => console.log('Error message:', err.statusText));
}