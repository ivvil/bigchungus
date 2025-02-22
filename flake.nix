{
  description = "A very basic flake";

  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs?ref=nixos-unstable";
    utils.url = "github:numtide/flake-utils";
  };

  outputs = {
    self,
    nixpkgs,
    utils,
  }:
    utils.lib.eachDefaultSystem
    (system: let
      pkgs = import nixpkgs {
        inherit system;
      };
    in {
      devShells.default = pkgs.mkShell {
        packages = with pkgs;
        with phpPackages;
        with phpExtensions; [
          mariadb
          laravel
          composer
          mysql84
          xdebug
        ];
      };

      apps = rec {
        dev = utils.lib.mkApp {
          drv = pkgs.writeShellScriptBin "composer-dev" ''
              ${pkgs.phpPackages.composer}/bin/composer run dev
          '';
        };

        default = dev;
      };
    });
}
