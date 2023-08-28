
mask();

function mask() {
    console.log('ta aqui')
    $('.maskCelular').inputmask({
        mask: "(99) 99999-9999",
        showMaskOnHover: false
    })
    $('.maskCEP').inputmask({
        mask: "99.999.999"
    })

    $('.maskCPF').inputmask({
        mask: "999.999.999-99"
        
    })
    $('.maskData').inputmask({
        mask: "99/99/9999"
        
    })
}

