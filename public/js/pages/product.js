function addVariableProduct(e)
{
    e.preventDefault()
    let btn = e.target
    if(! btn.classList.contains('addVP')) 
        return undefined

    let input = btn.closest('tr').querySelector('input[type="number"]')
    input.value = Math.abs(input.value)
 
    let obj = {
        id: btn.dataset.id,
        productid: btn.dataset.productid,
        image: btn.dataset.image,
        code: btn.dataset.code,
        name: btn.dataset.name,
        value: input.value
    }

    axios.post(btn.dataset.url, obj)
    .then(response => {
        btn.textContent = 'Agregado'
        setTimeout(() => {
            btn.textContent = 'cotizar'
        }, 1000);
    })
    .catch(error =>{
        console.error(error)
        btn.textContent = 'Error'
        setTimeout(() => {
            btn.textContent = 'cotizar'
        }, 1000);
    })
}

let table = document.querySelector('#tableVP')
table.addEventListener('click', addVariableProduct)