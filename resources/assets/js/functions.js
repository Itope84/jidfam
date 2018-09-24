let pluralise = function (str) {
  switch (str.charAt(str.length - 1)) {
    case 's':
      // it's already plural
      return str
    case 'y':
      return str.slice(0, -1) + 'ies'
    default:
      return str + 's'
  }
}

let ucfirst = function (str) {
  return str.charAt(0).toUpperCase() + str.slice(1)
}

export {ucfirst}
export {pluralise}
