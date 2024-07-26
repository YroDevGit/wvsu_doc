function ENCRYPT(value) {
    const string = value;
    const length = string.length;
    let ret = "";
    for (let i = 0; i < length; i++) {
        ret += SETCODE(string[i]);
    }
    return btoa(ret);
}

function SETCODE(value) {
    let ret = "";
    const char = UCODE(1);
    const code = UCODE(2);
    const index = char.indexOf(value);

    if (index !== -1) {
        ret = code[parseInt(index)];
    } else {
        console.log(`'${value}' is not found in the array.`);
    }
    return ret;
}

function DECODE(value) {
    const val = atob(value);
    const char = UCODE(1);
    const code = UCODE(2);
    const parts = val.split('*');
    let ret = "";
    for (let part of parts) {
        if (part !== '') {
            if (!code.includes(part + "*")) {
                window.location.href = "/";
            } else {
                const index = code.indexOf(part + "*");
                ret += char[index];
            }
        }
    }
    return ret;
}

function UCODE(num) {
    let ret = [];
    if (num === 1) {
        ret = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', "'", "!", "?", "@", '"', " ", ",", ".", "-", "=", "/", ";", ":", "^", "?", "*", "^", '_', '+'];
    }
    if (num === 2) {
        ret = [
            "XaB*", "QdS*", "JkO*", "QrS*", "sTu*", "PdS*", "ZaB*", "JmL*", "WnY*", "AbC*",
            "KlO*", "MnQ*", "aBc*", "NpL*", "OpR*", "TuV*", "HjK*", "UvW*", "JmK*", "PqS*",
            "CeF*", "QrT*", "GfK*", "aBd*", "XaC*", "BeG*", "TqV*", "TsV*", "DeF*", "ZaF*",
            "pQr*", "GhI*", "MnP*", "OpQ*", "GhJ*", "WzY*", "dEf*", "IjK*", "LmQ*", "NoP*",
            "aBe*", "KjL*", "BdH*", "WnX*", "KlM*", "GfJ*", "CdA*", "UtV*", "TuW*",
            "XyD*", "TsU*", "PrQ*", "LmN*", "XaY*", "HiJ*", "FgI*", "KpL*", "MqR*",
            "aBc*", "XyZ*", "WnZ*", "XaJ*", "XyQ*", "CdG*", "dEg*", "EfG*", "AbD*", "KlN*",
            "ZaB*", "JmT*", "NpQ*", "GhI*", "RsT*", "GfJ*", "NoP*", "WzY*", "PiS*",
            "HiK*", "CdM*", "IjK*", "QrU*", "JkL*", "BcD*", "pQr*", "KpM*", "FgH*", "DeG*",
            "TuV*", "EfG*", "aBc*", "CeH*", "QrV*", "VwX*", "JmK*", "KjM*", "WnX*", "XyZ*"
        ];
        
    }
    return ret;
}
