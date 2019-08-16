
//  export const loadListOfMerchants = state => {
//     return state.lstMerchants
//  }
 
 export const loadPaymentProviders = (state) => {
    return state.lstPaymentProviders
}

export const lstMobileProviders = state => {
   let lstMobileProvider = state.lstPaymentProviders.filter(provider => provider.payment_provider_type === 'mobile')
   return  lstMobileProvider
}

export const lstBankProviders = state => {
   let lstBankProvider = state.lstPaymentProviders.filter(provider => provider.payment_provider_type === 'bank')
   return lstBankProvider
}

export const loadAccountTypes = state => {
   return state.lstAccountTypes
}


